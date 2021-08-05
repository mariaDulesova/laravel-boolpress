<template>
  <section class="container mt-5">
    <div class="row">
      <div class="col text-center">
        <h2> Got questions?</h2>
        <p> Do not hesitate to contact us! </p>
      </div>
      <div class="col">
        <div class="alert alert-success" v-show="success">
          <p>The message has been send successfully, thank you for contacting us. We will reply to you within 24h</p>
        </div>
        <form @submit.prevent="sendForm">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"  placeholder="Your Name" v-model="name" :class="{ 'is-invalid' :errors.name}">
            <small
              v-for="(error, index) in errors.name"
              :key="`name-err-${index}`"
              class="text-danger">
              {{error}}
            </small>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="name@example.com" v-model="email" :class="{ 'is-invalid' :errors.name}">
            <small
              v-for="(error, index) in errors.email"
              :key="`email-err-${index}`"
              class="text-danger">
              {{error}}
            </small>
          </div>
          <div class="form-group">
            <label for="message">Your Message</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Your Message" v-model="message" :class="{ 'is-invalid' :errors.name}"></textarea>
            <small
              v-for="(error, index) in errors.message"
              :key="`message-err-${index}`"
              class="text-danger">
              {{error}}
            </small>
          </div>
          <button type="submit" class="btn btn-secondary" :disabled="sending"> {{(sending)?'Sending':'Send'}} </button>
        </form>
      </div>
    </div>   
  </section>
</template>

<script>
export default {
  name:'Contacts',
  data(){
    return{
      name:'',
      email: '',
      message:'',
      errors: {},
      success:false,
      sending:false
    }
  },
  methods: {
    sendForm: function(){
      this.sending=true;
      axios.post('http://127.0.0.1:8000/api/leads', {
        name: this.name,
        email:this.email,
        message: this.message
      })
      .then(
        res=> {
          this.sending=false;
          if(res.data.errors) {
            //se compare al meno un errore di validazione
            this.errors=res.data.errors;
            this.success=false;
          } else {
            //salvo il lead nel db
            this.errors = {},
            this.name ='',
            this.email='',
            this.message='',
            this.success=true
          }
        }
      )
      .catch(
        err=> {
          console.log(err);
        }
      )

    }
  }

}
</script>

<style>

</style>