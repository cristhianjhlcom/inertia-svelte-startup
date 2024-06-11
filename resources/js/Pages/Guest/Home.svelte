<script>
    import { Alert, Card } from "flowbite-svelte";
    import GuestLayout from "../../Layouts/GuestLayout.svelte";
    export let message;
</script>

<GuestLayout>
    <Card>
        <h1 class="text-3xl font-bold">Welcome Page</h1>
        <Alert>
            <span class="font-medium">Info Alert</span>
            {message}
        </Alert>
    </Card>
</GuestLayout>
