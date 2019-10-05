<template>
    <div>
        <form>
            <br>
            <div class="form-group">
                <label for="names">Nombres</label>
                <input type="text" class="form-control" id="names" v-model="user.name">
                <br>
                <span v-if="errors.name" :class="['alert alert-danger']">@{{ errors.name[0] }}</span>

            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" v-model="user.email" placeholder="name@example.com">
                <br>
                <span v-if="errors.email" :class="['alert alert-danger']">@{{ errors.email[0] }}</span>

            </div>
            <div class="form-group">
                <label for="country">País</label>
                <select @change="getCities()" class="form-control" v-model="user.country" id="country">
                    <option v-for="data in countries" :value="data.country_code">
                        {{ data.name }}
                    </option>
                </select>
                <br>
                <span v-if="errors.country" :class="['alert alert-danger']">@{{ errors.country[0] }}</span>
            </div>
            <div class="form-group">
                <label for="city">Ciudad</label>
                <select @change="getMunicipalities()" class="form-control" id="city" v-model="user.city">
                    <option v-for="data in cities" :value="data.id">
                        {{ data.name }}
                    </option>
                </select>
                <br>
                <span v-if="errors.city" :class="['alert alert-danger']">@{{ errors.city[0] }}</span>

            </div>
            <div class="form-group">
                <label for="municipality">Municipio</label>
                <select class="form-control" id="municipality" v-model="user.municipality">
                    <option v-for="data in municipalities" :value="data.id">
                        {{ data.name }}
                    </option>
                </select>
                <br>
                <span v-if="errors.municipality_id" :class="['alert alert-danger']">@{{ errors.municipality_id[0] }}</span>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" v-model="user.password">
                <br>
                <span v-if="errors.password" :class="['alert alert-danger']">@{{ errors.password[0] }}</span>

            </div>
        </form>

        <div class="form-group">
            <button class="btn btn-info" @click="store()" :disabled="saving">
                {{ saving ? 'Creando...' : 'Crear' }}
            </button>
        </div>

    </div>

</template>

<script>
    import Toasted from 'vue-toasted';

    Vue.use(Toasted);

    export default {
        data() {
            return {
                countries: [],
                cities: [],
                municipalities: [],
                saving: false,
                message: false,
                user: {
                    names: '',
                    email: '',
                    password: '',
                    country: '',
                    city: '',
                    municipality: ''
                },
                errors: [],
                errors_exist: false
            }
        },
        created() {
            this.getCountries();
        },
        methods: {
            getCountries() {
                this.user.city = '';
                this.user.municipality = '';
                this.cities = [];
                this.municipalities = [];
                this.$http.get('/api/countries').then(response => {
                    this.countries = response.data;
                })
                        .catch(err => console.log(err));
            },
            getCities() {
                this.user.municipality = '';
                this.municipalities = [];
                this.$http.get('/api/cities/' + this.user.country).then(response => {
                    this.cities = response.data;
                })
                        .catch(err => console.log(err));
            },
            getMunicipalities() {
                console.log(this.user);
                this.$http.get('/api/municipalities/' + this.user.city).then(response => {
                    this.municipalities = response.data;
                })
                        .catch(err => console.log(err));
            },
            store() {
                this.saving = true;
                this.message = false;
                this.$http.post('/api/users', this.user).then(response => {
                    this.$toasted.show('Usuario Registrado!', {
                        type: 'success'
                    }).goAway(1500);
                    this.user.name='';
                    this.user.email='';
                    this.user.country='';
                    this.user.city='';
                    this.user.municipality='';
                    this.user.password='';
                    this.errors=[];
                    
                })
                        .catch((e) => {
                            this.errors_exist = true;
                            this.errors = e.response.data.errors;
//                            if (error.response.status === 422) {
//                            }
//                            this.message = e.response.data.message || 'There was an issue creating the user.';
                        })
                        .then(() => this.saving = false);
            },
        }
    }
</script>