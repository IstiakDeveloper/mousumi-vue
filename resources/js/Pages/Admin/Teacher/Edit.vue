<template>
    <Head title="Edit Teacher" />

    <AdminLayout>
        <div class="mx-auto py-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-300 mb-6">Edit Teacher</h1>

                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input
                                v-model="form.name"
                                type="text"
                                id="name"
                                required
                                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                            />
                            <span v-if="form.errors.name" class="text-red-600 text-sm">{{ form.errors.name }}</span>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                required
                                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                            />
                            <span v-if="form.errors.email" class="text-red-600 text-sm">{{ form.errors.email }}</span>
                        </div>

                        <div>
                            <label for="subject_specialization" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject Specialization</label>
                            <input
                                v-model="form.subject_specialization"
                                type="text"
                                id="subject_specialization"
                                required
                                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                            />
                            <span v-if="form.errors.subject_specialization" class="text-red-600 text-sm">{{ form.errors.subject_specialization }}</span>
                        </div>

                        <div>
                            <label for="class_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Class</label>
                            <select
                                v-model="form.class_id"
                                id="class_id"
                                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                            >
                                <option value="">Select Class</option>
                                <option v-for="SchoolClass in classes" :key="SchoolClass.id" :value="SchoolClass.id">{{ SchoolClass.name }}</option>
                            </select>
                        </div>

                        <div>
                            <label for="section_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Section</label>
                            <select
                                v-model="form.section_id"
                                id="section_id"
                                class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                            >
                                <option value="">Select Section</option>
                                <option v-for="section in sections" :key="section.id" :value="section.id">{{ section.name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="btn-primary">
                            Update Teacher
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    teacher: Object,
    classes: Array,
    sections: Array,
});

const form = useForm({
    name: props.teacher.user.name,
    email: props.teacher.user.email,
    subject_specialization: props.teacher.subject_specialization,
    class_id: props.teacher.class_id,
    section_id: props.teacher.section_id,
});

function submit() {
    form.put(route('admin.teachers.update', props.teacher.id), {
        onSuccess: () => {
            // Redirect after successful update
        },
        onError: () => {
            // Handle errors if needed
        },
    });
}
</script>

<style scoped>
.btn-primary {
    @apply bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow hover:bg-blue-700 transition duration-200;
}
</style>
