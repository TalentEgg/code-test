<template>

    <div v-if="this.jobs!=0">
        <notifications group="foo"   />



                <div class="row">
                    <div class="col-lg-9">

                        <h4 class="card-title">Jobs ({{this.jobs.length}})</h4>

                    </div>

                </div>





            <div class="card-body">
                <div class="table-responsive">
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="search" placeholder="Search">
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">User</th>

                            <th @click="sort('title')">Title </th>
                            <th @click="sort('description')">Description </th>
                            <th @click="sort('username')">Posted </th>




                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(job, index) in (sortedActivity, filteredList)" :key="index">



                            <td class="text-center">{{job.id}}</td>
                            <td>{{job.user}}</td>
                            <td>{{job.title}}</td>
                            <td>{{job.description}}</td>
                            <td>{{job.created_at_human}}</td>






                            <td>

                                <a :href="jobLink(job.id)" class="btn btn-primary">

                                    Edit
                                </a>

                                <a href="#" class="btn btn-danger" @click="deleteJob(job)" >

                                   X
                                </a>





                            </td>
                        </tr>

                        </tbody>
                    </table>



                    <button @click="prevPage" class="float-left btn btn-outline-info btn-sm"><i class="material-icons">navigate_before</i> Previous</button>
                    <button @click="nextPage" class="float-right btn btn-outline-info btn-sm">Next <i class="material-icons">navigate_next</i></button>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <img src="../../images/loading.gif" height="70" width="70"/>
    </div>

</template>



<script>

    export default{

        data(){

            return{
                job:'',

                jobs:[],



                currentSort:'title',
                currentSortDir:'asc',
                search: '',
                searchSelection: '',
                pageSize: 5,
                currentPage: 1

            }
        },

        created(){
            this.fetchJobs();

        },

        computed:{



            sortedActivity:function() {

                return this.jobs.sort((a,b) => {
                    let modifier = 1;
                if(this.currentSortDir === 'desc') modifier = -1;
                if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
                if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
                return 0;
            }).filter((row, index) => {
                    let start = (this.currentPage-1)*this.pageSize;
                let end = this.currentPage*this.pageSize;
                if(index >= start && index < end) return true;
            });
            },

            filteredList () {
                return this.jobs.filter((data) => {
                    let name = data.title.toLowerCase().match(this.search.toLowerCase());
               // let user = data.username.toLowerCase().match(this.search.toLowerCase());

                return name  ;
            }).filter((row, index) => {
                    let start = (this.currentPage-1)*this.pageSize;
                let end = this.currentPage*this.pageSize;
                if(index >= start && index < end) return true;
            });
            }
        },
        methods:{

            /*********************** DATA TABLE FUNCTIONS ******************************/
            sort:function(s) {

                console.log("here")

                if(s === this.currentSort) {
                    this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
                }
                this.currentSort = s;
            },
            nextPage:function() {
                if((this.currentPage*this.pageSize) < this.jobs.length) this.currentPage++;
            },
            prevPage:function() {
                if(this.currentPage > 1) this.currentPage--;
            },

            /*********************** END DATA TABLE FUNCTIONS ******************************/


            /*********************** Jobs FUNCTIONS ******************************/



            fetchJobs(){
                console.log("heeeeree")

                axios.get('/api/jobs/all').then(response => {

                    this.jobs=response.data
            });

            },

            deleteJob(job){


                let data={
                    job_id:job.id
                }
                let ref = this


                Vue.dialog.confirm('Are you sure you want to delete this job ?')
                    .then(function (dialog) {
                        axios.post('/api/jobs/delete',data).then(response => {

                            //  console.log(response.data)

                            console.log("deleted")
                        ref.fetchJobs();

                        ref.$notify({
                            group: 'foo',
                            title: 'Important message',
                            type:'warn',
                            text: 'job deleted !'
                        });


                        ref.fetchJobs();


                    })


                    })
                    .catch(function () {
                      console.log('clicked on cancel!')
                    });
            },


            jobLink(job_id){
                return 'home#/edit/'+job_id;
            },


            /*********************** END SITES FUNCTIONS ******************************/










        }


    }

</script>