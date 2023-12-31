<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header"> Ingresar Tarea </div>
          <div class="card-body">
            <form method="POST" v-on:submit.prevent="saveTask()">
              <div class="form-group">
                <label for="todo">Crear tarea:</label>
                <input type="text" name="todo" id="todo" placeholder="New Task"
                  class="text-xl p-2 mr-2 w-9/12 border-b-2 border-green-500" v-model="task">
              </div>
              <input type="submit" value="Save" class="btn btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      task: ''
    }
  },
  methods: {
    saveTask() {
      axios.post('/tasks', { todo: this.task }).then(response => { console.log(response) }).catch(error => { console.log(error.response) })
      this.task = '';
      this.$router.push('/')

    }
  }
}
</script>