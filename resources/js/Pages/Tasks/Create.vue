<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    description: '',
    xp_reward: 10,
    daily_limit: 1
});

function submit() {
    form.post(route('tasks.store'));
}
</script>

<template>
    <div class="min-h-screen bg-[#0a0a0f] text-white p-4 md:p-8">
        <div class="max-w-xl mx-auto bg-[#13131a] p-6 rounded-md">
            <h1 class="text-xl font-bold mb-4">Nueva tarea</h1>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm mb-1">Título</label>
                    <input
                        v-model="form.title"
                        class="w-full bg-[#0f0f16] border border-[#13131a] rounded-md p-2"
                        required
                    />
                </div>

                <div>
                    <label class="block text-sm mb-1">Descripción</label>
                    <textarea
                        v-model="form.description"
                        class="w-full bg-[#0f0f16] border border-[#13131a] rounded-md p-2"
                    ></textarea>
                </div>

                <div>
                    <label class="block text-sm mb-1">XP recompensa</label>
                    <input
                        type="number"
                        v-model="form.xp_reward"
                        class="w-full bg-[#0f0f16] border border-[#13131a] rounded-md p-2"
                        min="1"
                    />
                </div>

                <div>
                    <label class="block text-sm mb-1">Límite diario</label>
                    <input
                        type="number"
                        v-model="form.daily_limit"
                        class="w-full bg-[#0f0f16] border border-[#13131a] rounded-md p-2"
                        min="1"
                    />
                </div>

                <button
                    type="submit"
                    class="w-full bg-[#0ea5e9] py-2 rounded-md text-white hover:opacity-90"
                    :disabled="form.processing"
                >
                    Guardar
                </button>
            </form>
        </div>
    </div>
</template>