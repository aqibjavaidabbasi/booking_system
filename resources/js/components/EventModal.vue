<template>
  <div v-if="show" class="modal">
    <div class="modal-content">
      <h2 class="modal-title">Add Event</h2>
      <form @submit.prevent="handleSubmit">
        <div class="form-group">
          <label for="eventName">Event Name:</label>
          <input v-model="eventName" type="text" id="eventName" required>
        </div>
        <div class="form-group">
          <label for="userEmail">Email:</label>
          <input v-model="userEmail" type="email" id="userEmail" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    show: Boolean, // Receive show prop from parent component
  },
  data() {
    return {
      eventName: "",
      userEmail: "",
    };
  },
  methods: {
    async handleSubmit(event) {
      // Implement validation here (optional)
      // You can use the browser's built-in validation or a library like vee-validate

      try {
        const response = await axios.post('/api/events', {
          name: this.eventName,
          email: this.userEmail,
        });

        // Handle successful form submission
        alert(`Event created: ${this.eventName} by ${this.userEmail}`);
        this.$emit('close'); // Emit an event to close the modal
        this.eventName = "";
        this.userEmail = "";
      } catch (error) {
        console.error('Error submitting event:', error);
        // Handle form submission errors (e.g., display error messages)
      }
    },
  },
};
</script>

<style scoped>
/* Style your modal here */
.modal {
  display: none; /* Hide initially */
  position: fixed;
  z-index: 1000; /* Ensure modal is on top */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4); /* Transparent background */
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* Center the modal */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Adjust modal width */
}

.modal-title {
  text-align: center;
  margin-bottom: 20px;
}
</style>
