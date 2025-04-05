<template>
  <div>
    <h3>From API: {{ message }}</h3>
    <button @click="fetchMessage">Get Message</button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "HelloApi",
  data() {
    return { message: "" };
  },
  methods: {
    async fetchMessage() {
      try {
        const r = await axios.get("http://localhost:9000/api/hello");
        console.log(r);
        this.message = r.data.message;
      } catch (error) {
        console.log(error);
        this.message = "Failed to fetch message";
      }
    },
  },
};
</script>