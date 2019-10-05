<template>
    <div>
        <form>
            <br>

            <div class="form-group">
                <button class="btn btn-primary" @click="processQueue()" :disabled="saving">
                    {{ saving ? 'Procesando...' : 'Procesar Cola' }}
                </button>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Destinatario</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="email in emails">
                        <th scope="row">{{ email.id }}</th>
                        <td>{{ email.subject }}</td>
                        <td>{{ email.to }}</td>
                        <td>{{ email.message }}</td>
                        <td>{{ email.state.name }}</td>
                    </tr>
                </tbody>
            </table>

        </form>

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
                saving: false,
                message: false,
                emails: []
            };
        },
        created() {
            this.getEmails();
        },
        methods: {

            getEmails() {
                this.$http.get('/api/emails/' + this.currentUser, ).then(response => {
                    console.log(response);
                    this.emails = response.data;
                })
                        .catch((e) => {
                            this.errors_exist = true;
                        });
            },

            processQueue() {
                this.saving = true;
                this.message = false;
                this.$http.put('/api/emails/' + this.currentUser, ).then(response => {
                    this.$toasted.show('Cola de Emails Procesados!', {
                        type: 'success'
                    }).goAway(1500);
                    this.getEmails();
                })
                        .catch((e) => {
                            this.errors_exist = true;
                        }).then(() => this.saving = false);
            }
        }
    }
</script>