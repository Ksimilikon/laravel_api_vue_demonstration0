import http from "@/http";
async function isAuth(){
    // return localStorage.getItem('token') != null;
    let res = false;
    try{
        await http.get('/api/checkAuth').then(response=>{
            console.log("isAuth::success");
            res = true;
        })
        .catch(error=>{
            if(error.response && error.response.status === 401){
                console.log('isAuth::status 401');
            }
        });
    }
    catch (error){
        console.log(error);
    }
    console.log(res+" result isAuth()")
    return await res;
}
export default isAuth;