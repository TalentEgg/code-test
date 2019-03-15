<template>
    <div>

            <H2>
						Add Job
            </H2>


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
            <button class="btn btn-primary" v-on:click="add()">
                Post
            </button>
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


        methods:{

            add(){
                console.log(this.companyName);

                if(this.validate()) {

                    let data={
                        jobTitle:this.jobTitle,
                        jobDescription:this.jobDescription,
                    }

                    let ref=this

                    axios.post('/jobs/add', data)

                        .then(response => {

                            console.log(response);




                    });





                    this.jobTitle=""
                    this.jobDescription=""


                    this.$dialog.alert('Job Posted!').then(function(dialog) {


                    });






                }
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