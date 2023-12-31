<template>
    <div class="w-full sm:w-8/12 md:w-5/12 p-5 bg-white">
        <h1 class="text-3xl text-center font-bold py-4 text-gray-800">Create Tasks</h1>
        <form method="POST" v-on:submit.prevent="saveTask()">
            <div class="d-block flex px-2 py-4">
                <input type="text" name="todo" placeholder="New Task"  class="text-xl p-2 mr-2 w-9/12 border-b-2 border-green-500" v-model="task">
            </div>
            <div class="ml-auto flex">
              <input type="submit" value="Save" class="bg-green-500 w-2/12 text-white">

            </div>
        </form>
    </div>
</template>
<script>
export default{
    data(){
      return {
        task: ''
      }
    },
    methods:{
      saveTask(){
         axios.post('/tasks',{ todo: this.task} ).then(response => {console.log(response)}).catch(error => { console.log(error.response)})
        this.task = '';
        this.$router.push('/')

      }
    }
}
</script>