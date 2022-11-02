<template>
    <div>
        <div class="card">
            <div class="card-header">Find Dentists</div>
            <div class="card-body">
                <datepicker class="my-datepicker" calendar-class="my-datepicker_calendar" :disabledDates="disabledDates" :format="customDate" v-model="time" :inline="true"></datepicker>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Dentists</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Service</th>
                            <th>Booking</th>
                        </tr>
                    </thead>
                        <tbody>
                            <tr v-for="(d,index) in dentists">
                                <th scope="row">{{ index+1 }}</th>
                                <td>
                                    <img :src=" '/Images/' +d.dentist.image" width="80">
                                </td>
                                <td>{{ d.dentist.name }}</td>
                                <td>{{ d.dentist.service }}</td>
                                <td>
                                    <a :href=" '/newAppointment/'+d.user_id+'/'+d.date">
                                        <button class="btn btn-success">Book Appointment</button></a>
                                </td>
                            </tr>
                            <td v-if="dentists.length==0">No available dentist on {{this.time}}</td>
                        </tbody>
                </table>
                <div class="text-center">
                    <beat-loader :loading="loading" :color="color" :size="size"></beat-loader>
                </div>
            </div>
        </div>


    </div>
</template>

<script type="text/javascript">
    import datepicker from 'vuejs-datepicker';
    import moment from 'moment';
    import BeatLoader from 'vue-spinner/src/BeatLoader.vue';
    import axios from 'axios';
    export default{
        data(){
            return{
                time:'',
                dentists:[],
                loading :false,
                disabledDates:{
                    to:new Date(Date.now())//disabled from previous days until current day(one day before booking)
                }

            }
        },
        components:{
            datepicker,
            BeatLoader
        },
        methods:{
            customDate(date){
                this.loading = true
                this.time = moment(date).format('YYYY-MM-DD');
                axios.post('/api/finddentists',{date:this.time}).then((response)=>{
                    setTimeout(()=>{
                        this.dentists = response.data
                        this.loading = false
                    },600)
                }).catch((error)=>{alert('error')})
            }
        },
        mounted(){
            this.loading = true
            axios.get('/api/dentists/today').then((response)=>{
                this.dentists = response.data
                this.loading = false
            })
        }
    }
</script>

<style scoped>
    .my-datepicker >>> .my-datepicker_calendar{
        width: 100%;
        height:350px;
    }
</style>
 