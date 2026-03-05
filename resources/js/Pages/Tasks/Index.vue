<script setup>
import { Link, usePage, router } from '@inertiajs/vue3';

const tasks = usePage().props.tasks;

function complete(task) {
    router.post(`/tasks/${task.id}/complete`, {}, {
        onSuccess: () => {
            router.visit(route('tasks.index'), {
                preserveScroll: true
            });
        }
    });
}
</script>

<template>
    <div class="min-h-screen bg-[#0a0a0f] text-white p-6">
        <h1 class="text-2xl font-bold mb-4">Mis tareas</h1>

        <Link :href="route('tasks.create')"
            class="inline-block bg-[#0ea5e9] text-white px-4 py-2 rounded-md hover:opacity-90">
            Nueva tarea
        </Link>

        <div class="mt-6 space-y-4">
            <div v-if="tasks.length === 0" class="text-gray-400">
                No hay tareas
            </div>

            <div v-for="task in tasks" :key="task.id" class="bg-[#13131a] border border-gray-800 rounded-lg p-4">
                <h2 class="text-lg font-semibold">{{ task.title }}</h2>
                <p class="text-gray-400">{{ task.description }}</p>
                <p class="mt-2 text-sm text-[#0ea5e9]">
                    XP: {{ task.xp_reward }}
                </p>

                <p v-if="task.completed" class="text-green-500 mt-2">
                    Completada
                </p>

                <button class="px-4 py-2 rounded-lg font-semibold transition mt-3" :class="task.completed
                    ? 'bg-gray-700 text-gray-400 cursor-not-allowed'
                    : 'bg-[#0ea5e9] text-white hover:bg-[#0b82c4]'" :disabled="task.completed"
                    @click="complete(task)">
                    {{ task.completed ? 'Completada' : 'Completar' }}
                </button>
            </div>
        </div>
    </div>
</template>