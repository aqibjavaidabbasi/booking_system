<template>
  <div id="app">
    <div id="login">
      <div id="description">
        <h1>Enter Access Code</h1>
        <p>Enter the unique meeting room access code.</p>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text ever
          since the 1500s, when an unknown printer took a galley of type and
          scrambled it to make a type specimen book.
        </p>
      </div>
      <div id="form">
        <form @submit.prevent="checkAccessCode">
          <label for="access_code">Access Code</label>
          <input
            class="form-control form-control-lg"
            v-model="accessCode"
            type="text"
            id="access_code"
            autocomplete="off"
            style="background-color: white"
          />
          <p style="color: red">{{ errorMessage }}</p>
          <button type="submit" class="btn btn-outline-light">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();
const accessCode = ref("");
const errorMessage = ref("");
const checkAccessCode = async () => {
  try {
    const response = await axios.post("/api/validate-access-code", {
      access_code: accessCode.value,
    });
    console.log(response.data.valid);

    if (response.data.valid) {
      router.replace({ name: "Booking" });
    } else {
      console.log(response.data.valid);
      errorMessage.value = "Invalid access code.";
    }
  } catch (error) {
    errorMessage.value = "Error validating access code.";
  }
};
</script>

<style>
* {
  box-sizing: border-box;
  font-family: Verdana, sans-serif;
}

html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
  width: 100%;
}

div#app {
  width: 100%;
  height: 100%;
}

div#app div#login {
  align-items: center;
  background-color: #e2e2e5;
  display: flex;
  justify-content: center;
  width: 100%;
  height: 100%;
}

div#app div#login div#description {
  background-color: #ffffff;
  width: 24rem;
  height: 16rem;
  padding: 35px;
}

div#app div#login div#description h1,
div#app div#login div#description p {
  margin: 0;
}

div#app div#login div#description p {
  font-size: 0.8em;
  color: #95a5a6;
  margin-top: 10px;
}

div#app div#login div#form {
  background-color: #34495e;
  border-radius: 5px;
  box-shadow: 0px 0px 30px 0px #666;
  color: #ecf0f1;
  width: 34rem;
  height: 18rem;
  padding: 4rem;
}

div#app div#login div#form label,
div#app div#login div#form input {
  outline: none;
  width: 100%;
}

div#app div#login div#form label {
  color: #95a5a6;
  font-size: large;
}

div#app div#login div#form input {
  background-color: transparent;
  border: none;
  color: rgb(10, 10, 10);
  font-size: 1.7em;
  margin-bottom: 20px;
}

div#app div#login div#form ::placeholder {
  color: rgb(3, 3, 3);
  opacity: 1;
}

div#app div#login div#form button {
  font-size: 1.7em;
  margin-bottom: 20px;
  width: 26.2rem;
}

@media screen and (max-width: 600px) {
  div#app div#login {
    align-items: unset;
    background-color: unset;
    display: unset;
    justify-content: unset;
  }

  div#app div#login div#description {
    margin: 0 auto;
    max-width: 350px;
    width: 100%;
  }

  div#app div#login div#form {
    border-radius: unset;
    box-shadow: unset;
    width: 100%;
  }

  div#app div#login div#form form {
    margin: 0 auto;
    max-width: 280px;
    width: 100%;
  }
}
</style>
