
<template>
    <div class="w-full sm:w-8/12 md:w-5/12 p-5 bg-white">
        <div v-for="task in tasks.data" :key="task.id"
         class="flex justify-content p-2 border-b-2 border-gray-300 my-2">
            <input type="checkbox" :checked="checkCompleted(task.completed)" @click="completeTask(task)">
                <p class="mx-2 mt-l text-gray-900 ">
                    {{ task.todo }}
                </p>
                <div class="ml-auto flex">
                    <router-link :to="'/edit/'+task.id" width="28" height="28">
                        <svg class="h-6 w-6 text-green-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />  <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg>
                    </router-link>
                    <form v-on:submit.prevent="deleteTask(task.id)">

                        <button type="submit" >
                            <svg class="h-6 w-6 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="4" y1="7" x2="20" y2="7" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" />  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </button>
                    </form>
                </div>
        </div>
        <tailwind-pagination
          :data="tasks"
          @pagination-change-page="getTasks"
        />
    <!-- <vue-pagination :data="tasks.data" :per-page="10" @pagination-change-page="getTasks" /> -->
    <!-- <pagination :data="tasks" @pagination-change-page="getTasks" /> -->
    <!-- <h1>Tasks list</h1> -->
  </div>
</template>

<script>
import { TailwindPagination } from "laravel-vue-pagination";

export default {
    components: {
        TailwindPagination,
    },
    data() {
        return {
            tasks: []
        }
    },
    methods: {
        getTasks(page = 1) {
            axios.get('/tasks?page=' + page).then(response => { this.tasks = response.data }).catch(error => { console.log(error.response) });
        },
        deleteTask(id) {
            axios.delete('/tasks/' + id).then(response => { console.log(response) }).catch(error => { console.log(error.response) });
            this.getTasks();
            // alert(id);            
            // axios.delete('/tasks/'+id, { headers: { 'X-CSRF-TOKEN': window.Laravel.csrfToken, }, 
        },
        completeTask(task) {
            if (task.completed === 0) {
                var complete = 1;
            } else {
                var complete = 0;
            }
            axios.put('/tasks/' + task.id, {
                task: task.todo,
                completed: complete
            }).then(response => { console.log(response) }).catch(error => { console.log(error.response) });

            this.getTasks();
            // alert(task.completed)
        },
        checkCompleted(param) {
            if (param === 1) {
                return true;
            } else {
                return false;
            }
        }

    },
    created() {
        this.getTasks();
    }
}
</script>