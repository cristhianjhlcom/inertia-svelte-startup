<script>
    import { inertia, useForm } from "@inertiajs/svelte";
    import AuthLayout from "../../Layouts/AuthLayout.svelte";
    import {
        Button,
        Card,
        Label,
        Input,
        Helper,
        Checkbox,
    } from "flowbite-svelte";

    export let loginLink;

    let form = useForm({
        email: "",
        password: "",
    });

    function submit() {
        $form.post(loginLink, {
            preserveScroll: true,
            onSuccess: () => $form.reset("password"),
        });
    }
</script>

<svelte:head>
    <title>Iniciar Sesion</title>
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
            Iniciar Sesion
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
            <div class="flex items-center justify-between">
                <Checkbox class="accent-primary-600" name="remember"
                    >Remember me</Checkbox
                >
                <a use:inertia href="/" aClass="ml-auto text-sm"
                    >Lost Password?</a
                >
            </div>
            <Button type="submit" size="lg" disabled={$form.processing}
                >Crear cuenta</Button
            >
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                Not registered? <a use:inertia href="/register"
                    >Create account</a
                >
            </div>
        </form>
    </Card>
</AuthLayout>
