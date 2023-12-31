
<template>
    <div class="container">
        <div class="row">
            <div class="col">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Completado</th>
                            <th>Tarea</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="task in tasks.data" :key="task.id">
                            <td>
                                <input type="checkbox" :checked="checkCompleted(task.completed)"
                                    @click="completeTask(task)">
                            </td>
                            <td>{{ task.todo }}</td>
                            <td>
                                <router-link :to="'/edit/' + task.id">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </router-link>
                            </td><td>
                            <form v-on:submit.prevent="deleteTask(task.id)">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :data="tasks" @pagination-change-page="getTasks" />
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from 'vue-pagination-simple';

export default {
    components: {
        Pagination,
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