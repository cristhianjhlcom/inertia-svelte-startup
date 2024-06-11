<script>
    import { page, inertia } from "@inertiajs/svelte";

    let auth = $page.props.auth;
</script>

<main class="bg-gray-50 h-screen dark:bg-gray-900 w-full">
    <header>
        <nav class="max-w-5xl mx-auto py-4 sm:py-6">
            <a use:inertia href="/">Home</a>
            {#if !auth.user}
                <a use:inertia href="/login">Iniciar Sesion</a>
                <a use:inertia href="/register">Registrarse</a>
            {/if}
            {#if auth.user}
                <a use:inertia href="/">{auth.user.email}</a>
                <a use:inertia href="/dashboard">Admin</a>
                <button
                    use:inertia={{ href: "/logout", method: "post" }}
                    type="button">Logout</button
                >
            {/if}
        </nav>
    </header>
    <article class="max-w-5xl mx-auto">
        <slot />
    </article>
</main>
