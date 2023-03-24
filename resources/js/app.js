import './bootstrap'
import { createApp } from "vue"
import app from "./components/app.vue"
import router from "./router/index.js"

// app = createApp()
// app.component("todo-list-grid", TodoListGrid)
// app.mount("#app")

createApp(app).use(router).mount("#app")