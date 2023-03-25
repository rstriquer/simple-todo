<template>
  <div class="col-lg-12 col-md-12 mt-2">
    <h1>Tasks <span class="text-secondary">({{ tasks.length }})</span></h1>
  </div>
  <div class="col-lg-12 col-md-12 mt-2">
    <div class="input-group rounded-lg">
      <input type="text" name="query" id="query" class="form-control">
      <div class="input-group-append">
        <button @click="addTask" class="bg-primary text-white border-0"><i class="fa fa-plus"></i> Add</button>
      </div>
    </div>
  </div>
  <div class="container mt-3">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-box clearfix">
          <div class="table-responsive" v-if="tasks.length > 0">
            <table class="table user-list">
              <tbody>
                <tr v-for="item in tasks" :key="item.id" :class="{ 'bg-secondary': (item.done == 1), 'bg-light': (item.done == 0) }">
                  <td><del v-if="item.done==1">{{ item.task }}</del><span v-else>{{ item.task }}</span></td>
                  <td>  
                    <button type="button" class="btn btn-danger btn-sm" @click="doneTask(item.id, item.done == 1)">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-lg-12" v-else>
            <h1 class="text-center">No task found</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { onMounted, ref } from "vue";

let tasks = ref([]);

onMounted(async () => {
  getTasks();
});

const getTasks = async () => {
  let response = await axios.get("/api/tasks/");
  tasks.value = response.data.tasks;
};

const addTask = async () => {
  let response = await axios.post("/api/tasks/store", {done: 0, task: query.value});
  getTasks();
}

const doneTask = async (id, done) => {
  let response = await axios.patch("/api/tasks/done", {task: id});
  getTasks();
}
</script>
