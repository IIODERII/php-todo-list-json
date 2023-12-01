const { createApp } = Vue;

createApp({
  data() {
    return {
      tasks: [
        {
          id: 1,
          text: "Prendere il rum",
          done: false,
        },
        {
          id: 2,
          text: "Aggiustare la nave",
          done: true,
        },
        {
          id: 3,
          text: "Comprare (rubare) le provviste",
          done: false,
        },
      ],
      lastID: 3,
      newTask: "",
      filterValue: "",
    };
  },
  methods: {
    removeTask(id) {
      const index = this.tasks.findIndex((task) => task.id === id);
      this.tasks.splice(index, 1);
    },
    addTask() {
      if (this.newTask.trim().length > 0) {
        this.tasks.unshift({
          id: this.lastID,
          text: this.newTask,
          done: false,
        });
        this.newTask = "";
      }
    },
    toggleDone(id) {
      const index = this.tasks.findIndex((task) => task.id === id);
      this.tasks[index].done = !this.tasks[index].done;
    },
  },
  computed: {
    filteredTasks() {
      if (this.filterValue === "undone") {
        return this.tasks.filter((task) => !task.done);
      } else if (this.filterValue === "done") {
        return this.tasks.filter((task) => task.done);
      } else {
        return this.tasks;
      }
    },
  },
}).mount("#app");
