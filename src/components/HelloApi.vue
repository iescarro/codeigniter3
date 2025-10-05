<template>
  <div class="hello">
    <h1>{{ message }}</h1>
    <p>
      "Hello, world!" message comes from an API call to the CodeIgniter3 backend
      under the <code>controllers/api/Hello.php</code> controller.<br />
    </p>
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
        const r = await axios.get("http://localhost:8000/api/hello");
        console.log(r);
        this.message = r.data.message;
      } catch (error) {
        console.log(error);
        this.message = "Failed to fetch message";
      }
    },
  },
  mounted() {
    this.fetchMessage();
  },
};
</script>
