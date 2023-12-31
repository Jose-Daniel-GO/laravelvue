<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Iniciar Sesión
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="email">Correo:</label>
                                <input type="text" class="form-control" placeholder="Ingresa tu correo" v-model="email"
                                    id="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="passwor" class="form-control" placeholder="Ingresa tu contraseña"
                                    v-model="password" id="password">
                            </div>
                            <button type="submit" class="btn btn-primary" @click.prevent="authUser">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
    // import { ref } from 'vue'
    // import AuthService from '@/services/AuthService';
    // // import AuthService from '../services/AuthService';
    // let email = ref("")
    // let password = ref("")

    // const authUser = async () => {
    //     const auth = new AuthService()
    //     const success = await auth.login(email.value, password.value)
    //     if(success){
    //         alert('Exito!')
    //     } else {
    //         alert('Login incorrecto')
    //     }
    // }

    // const getUserInfo = () => {
    //     const token = $session.get('auth');
    // }
    // const takeInfoFromUser = () => {
    //     const token = $cookies.get('auth');
    // }
</script>
<!-- <style scoped></ style> -->