<script>
    import { inertia, useForm } from "@inertiajs/svelte";
    import AuthLayout from "../../Layouts/AuthLayout.svelte";
    import { Button, Card, Label, Input, Helper } from "flowbite-svelte";

    export let registerLink;

    let form = useForm({
        email: "",
        password: "",
        password_confirmation: "",
    });

    function submit() {
        $form.post(registerLink, {
            preserveScroll: true,
            onSuccess: () => $form.reset("password"),
        });
    }
</script>

<svelte:head>
    <title>Registro</title>
</svelte:head>

<AuthLayout>
    <a
        use:inertia
        href="/"
        class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white"
    >
        <span>InertiaSvelte</span>
    </a>
    <Card class="w-full" size="md" border={false}>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Crear una cuenta
        </h1>
        <form class="mt-8 space-y-6" on:submit|preventDefault={submit}>
            <div>
                <Label for="email" class="space-y-2 dark:text-white">
                    Your Email
                </Label>
                <Input
                    type="email"
                    id="email"
                    placeholder="name@company.com"
                    class="border outline-none dark:border-gray-600 dark:bg-gray-700"
                    bind:value={$form.email}
                />
                {#if $form.errors.email}
                    <Helper class="mt-2" color="red">
                        {$form.errors.email}
                    </Helper>
                {/if}
            </div>
            <div>
                <Label for="password" class="space-y-2 dark:text-white"
                    >Your Password</Label
                >
                <Input
                    type="text"
                    id="password"
                    placeholder="••••••••"
                    autocomplete="new-password"
                    class="border outline-none dark:border-gray-600 dark:bg-gray-700"
                    bind:value={$form.password}
                />
                {#if $form.errors.password}
                    <Helper class="mt-2" color="red">
                        {$form.errors.password}
                    </Helper>
                {/if}
            </div>
            <div>
                <Label
                    for="password_confirmation"
                    class="space-y-2 dark:text-white"
                >
                    Confirm password
                </Label>
                <Input
                    type="text"
                    id="password_confirmation"
                    placeholder="••••••••"
                    autocomplete="new-password"
                    class="border outline-none dark:border-gray-600 dark:bg-gray-700"
                    bind:value={$form.password_confirmation}
                />
                {#if $form.errors.password_confirmation}
                    <Helper class="mt-2" color="red">
                        {$form.errors.password_confirmation}
                    </Helper>
                {/if}
            </div>
            <Button type="submit" size="lg" disabled={$form.processing}
                >Crear cuenta</Button
            >
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Already have an account? <a use:inertia href="/login">Login</a>
            </div>
        </form>
    </Card>
</AuthLayout>
