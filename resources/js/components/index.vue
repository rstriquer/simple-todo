<template>
  <div class="col-lg-12 col-md-12 mt-2">
    <h1>Tasks ()</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-box clearfix">
          <div class="table-responsive">
            <table class="table user-list">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">done</th>
                  <th scope="col">task</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>true</td>
                  <td>Task 1</td>
                  <td>
                    <button type="button" class="btn btn-primary btn-sm">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
// import { defineComponent } from '@vue/composition-api'

// export default defineComponent({
//     setup() {

//     },
// })
</script>
