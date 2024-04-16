<!-- <template>
    <div id="login" class="bg-dark">
      <div id="form">
        <form @submit.prevent="checkAccessCode">
          <h2 class="text-center mb-4">Enter Access Code</h2>
          <input
            class="form-control form-control-lg"
            v-model="accessCode"
            type="text"
            id="access_code"
            autocomplete="off"
            placeholder="Access Code"
            style="background-color: white"
          />
          <p style="color: red">{{ errorMessage }}</p>
          <button type="submit" class="btn btn-outline-light">Submit</button>
        </form>
      </div>
    </div>
</template> -->
<template>

   <div class="auth-page-wrapper" style="padding-top: 8.5rem !important">
        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <!-- <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div> -->
                            <p class="mt-3 fs-15 fw-medium">Booking Meeting</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome</h5>
                                    <!-- <p class="text-muted">Sign in to continue to Velzon.</p> -->
                                </div>
                                <div class="p-2 mt-4">
                                    <form @submit.prevent="checkAccessCode">

                                        <div class="mb-3">
                                            <label for="access_code" class="form-label">Access Code</label>
                                            <input type="number" class="form-control "
                                                v-model="accessCode" id="access_code" placeholder="Enter access code" autocomplete="off" >
                                                <p style="color: red">{{ errorMessage }}</p>
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary w-100" >Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->
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
    errorMessage.value = "Enter valid  access code.";
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
  background-color: #2b4157!important;
  display: flex;
  justify-content: center;
  width: 100%;
  height: 100%;
}

div#app div#login div#description {
  background-color: #2b4157!important;
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
  /* box-shadow: 0px 0px 30px 0px #666; */
  border: 1px solid #2c3e50;
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
  background-color: #2c3e50!important;
  border: none;
  color: #ecf0f1;
  font-size: 1.7em;
  margin-bottom: 20px;
  border: 1px solid #95a5a6;
}

div#app div#login div#form ::placeholder {
  color: #95a5a6;
  opacity: 1;
}

div#app div#login div#form button {
  font-size: 1.7em;
  margin-bottom: 20px;
  width: 26.2rem;
  border: 1px solid #95a5a6;
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
