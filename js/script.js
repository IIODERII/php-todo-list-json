const { createApp } = Vue;

createApp({
  data() {
    return {
      tasks: [],
      newTask: "",
      filterValue: "",
      apiURL: "server.php",
    };
  },
  methods: {
    readList() {
      axios.get(this.apiURL).then((response) => {
        this.tasks = response.data;
      });
    },
    deleteTask(index) {
      const data = new FormData();
      data.append("deleteTask", index);

      axios.post(this.apiURL, data).then((response) => {
        this.tasks = response.data;
      });
    },
    addTask() {
      if (this.newTask.trim().length > 0) {
        const data = new FormData();
        data.append("addTask", this.newTask);

        axios.post(this.apiURL, data).then((response) => {
          this.tasks = response.data;
          this.newTask = "";
        });
      }
    },
    toggleDone(index) {
      const data = new FormData();
      data.append("toggleDone", index);

      axios.post(this.apiURL, data).then((response) => {
        this.tasks = response.data;
      });
    },
  },
  computed: {
    filteredTasks() {
      if (this.filterValue === "undone") {
        return this.tasks.filter((task) => task.done === false);
      } else if (this.filterValue === "done") {
        return this.tasks.filter((task) => task.done === true);
      } else {
        return this.tasks;
      }
    },
  },
  mounted() {
    this.readList();
  },
}).mount("#app");
