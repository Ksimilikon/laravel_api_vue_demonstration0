import router from "@/router";
import isAuth from "./isAuth";
import { useRoute } from "vue-router";
export async function AuthMiddleware() {
    const route = await useRoute();
    console.log("RouteName: "+route.name);
    if(await isAuth()){
        console.log("middleware::true")
        if(route.name != 'Massendger'){
            console.log("middleware::to(/)");
            await router.push('/');
        }
    }
    else{
        console.log('middleware::false')
        if(route.name != 'login' && route.name != 'register'){
            console.log('middleware::to(/login)')
            await router.push('/login');
        }
    }
}