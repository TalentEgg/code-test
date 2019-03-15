<template>
    <div>

           <h2>Edit Job</h2>

        <div v-if="this.jobTitle!=''">

                <transition name="bounce">
                    <div class="alert alert-danger" v-if="!this.isValidated">
                        <strong>Error!</strong> Please enter valid information!
                    </div>
                </transition>

                <form class="login100-form validate-form">


                    <div class="wrap-input100 validate-input">

                        <input class="form-control" type="text" id="c_name" placeholder="Job's title" v-model="jobTitle">

                    </div>

                    <br>
                    <div class="wrap-input100 validate-input">

                        <textarea class="form-control" type="text" id="l_key" placeholder="Job's description" v-model="jobDescription">
                        </textarea>

                    </div>
                    <br>



                </form>

                <div class="container-login100-form-btn">
                    <button class="btn btn-primary" v-on:click="update()">
                        Update
                    </button>
                </div>

        </div>

        <div v-else>
            <img src="../../images/loading.gif" height="70" width="70"/>
        </div>

    </div>
</template>

<script>

    export default{

        data(){

            return{
                jobTitle:'',
                jobDescription:'',
                isValidated : true,

            }



        },

        created(){

            console.log( this.$route.params.id )

            this.getJob(this.$route.params.id);
        },


        methods:{

            update(){
                console.log(this.companyName);

                if(this.validate()) {

                    let data={
                        jobId : this.$route.params.id,
                        jobTitle:this.jobTitle,
                        jobDescription:this.jobDescription,
                    }

                    let ref=this

                    axios.post('/api/jobs/update', data)

                        .then(response => {

                        console.log(response);

                    this.isLoading=false;




                    this.$dialog.alert('Job updated').then(function(dialog) {

                        ref.$router.push('/')

                    });



                });







                }
            },


            getJob(id){

                let data={
                    jobId:id

                }


                let ref=this

                axios.post('/api/jobs/get', data)
                .then(response => {

                    this.jobTitle=response.data.title
                    this.jobDescription=response.data.description

                    this.isLoading=false;




            });

            },




            validate(){
                if(this.jobTitle=="" || this.jobDescription==""){
                    this.isValidated=false;
                    return false
                }

                else
                    return true;
            }

        }

    }
</script>


<style>
    .bounce-enter-active {
        animation: bounce-in .5s;
    }
    .bounce-leave-active {
        animation: bounce-in .5s reverse;
    }
    @keyframes bounce-in {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.5);
        }
        100% {
            transform: scale(1);
        }
    }
</style>