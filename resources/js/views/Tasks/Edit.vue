<template>
  <div class="contrainer">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h1 class="">Edit Task {{ id }}</h1>
          </div>
          <div class="card-body">
             <form method="POST" v-on:submit.prevent="saveTask()">
              <div class="form-group">
                <input type="text" v-model="task.todo" placeholder="New Task" name="todo" class="form-control">
                <input type="submit" value="Save" class="btn btn-primary">
              </div>
              <!-- <div class="ml-auto flex"></div> -->
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
      id: this.$route.params.id,
      task: []
    }
  },
  created() {
    axios.get('/tasks/' + this.id + '/edit').then(response => { this.task = response.data }).catch(error => { console.log(error.response) })
  },
  methods: {
    saveTask() {
      axios.put(`/tasks/${this.id}`, { todo: this.task.todo }).then(response => { console.log(response) }).catch(error => { console.log(error.response) })
      this.task.todo = '';
      this.$router.push('/')
      // alert(this.task.todo);

    }
  }
}
</script>