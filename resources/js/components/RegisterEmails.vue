<template>
    <div>
        <form>
            <br>
            <div class="form-group">
                <label for="subject">Asunto</label>
                <input type="text" class="form-control" id="subject" v-model="email.subject">
                <br>
                <span v-if="errors.subject" :class="['alert alert-danger']">@{{ errors.subject[0] }}</span>

            </div>
            <div class="form-group">
                <label for="to">Para</label>
                <input type="email" class="form-control" id="to" v-model="email.to" placeholder="name@example.com">
                <br>
                <span v-if="errors.to" :class="['alert alert-danger']">@{{ errors.to[0] }}</span>

            </div>
            <div class="form-group">
                <label for="message">Mensaje</label>
                <textarea class="form-control" id="message" v-model="email.message"></textarea>
                <br>
                <span v-if="errors.message" :class="['alert alert-danger']">@{{ errors.message[0] }}</span>
            </div>

        </form>

        <div class="form-group">
            <button class="btn btn-info" @click="store()" :disabled="saving">
                {{ saving ? 'Agregando...' : 'Agregar' }}
            </button>
        </div>

    </div>

</template>

<script>
    import Toasted from 'vue-toasted';

    Vue.use(Toasted);

    const props = {

        currentUser: {
            type: Number,
            required: true
        }

    }
    export default {

        props: props,

        data() {
            return {
                countries: [],
                cities: [],
                municipalities: [],
                saving: false,
                message: false,
                email: {
                    user_id: this.currentUser,
                    subject: '',
                    to: '',
                    message: ''
                },
                errors: [],
                errors_exist: false
            };
        },
        created() {
        },
        methods: {

            store() {
                this.saving = true;
                this.message = false;
                this.$http.post('/api/emails', this.email).then(response => {
                    this.$toasted.show('Email Agregado a Cola de Emails!', {
                        type: 'success'
                    }).goAway(1500);
                    this.email.subject = '';
                    this.email.to = '';
                    this.email.message = '';
                    this.errors = [];

                })
                        .catch((e) => {
                            this.errors_exist = true;
                            this.errors = e.response.data.errors;
//                            if (error.response.status === 422) {
//                            }
//                            this.message = e.response.data.message || 'There was an issue creating the user.';
                        })
                        .then(() => this.saving = false);
            }
        }
    }
</script>