import listJobs from './components/jobs/ListComponent'
import AddJob from './components/jobs/AddComponent'
import EditJob from './components/jobs/EditComponent'





const routes = [



    { path: '/', component: listJobs },
    { path: '/add', component: AddJob },
    { path: '/edit/:id', component: EditJob },


];

export default routes;