import React,{useEffect} from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { Head } from '@inertiajs/inertia-react';

export default function Dashboard(props) {
    useEffect(()=>{
      window.axios.get('/api/user')
      .then(response => {
          console.log(response.data);
      });
      // can see anyone logged in
      window.axios.get('/api/post')
      .then(response => {
          console.log(response.data);
      });
      // user id=94 cannot see
      window.axios.get('/api/post/1')
      .then(response => {
          console.log(response.data);
      });
      // user id=94 can see per content_group
      window.axios.get('/api/post/6')
      .then(response => {
          console.log(response.data);
      });
      // user id=94 can see as author
      window.axios.get('/api/post/29')
      .then(response => {
          console.log(response.data);
      });

      // cannot see without client_credentials grant
      window.axios.get('/api/post/data')
      .then(response => {
          console.log(response.data);
      });
      // check auth
      window.axios.get('/api/post/auth/1')
      .then(response => {
          console.log(response.data);
      });;

      // check auth
      window.axios.get('/api/post/auth/6')
      .then(response => {
          console.log(response.data);
      });;


    },[]);
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 bg-white border-b border-gray-200">You're logged in!</div>
                    </div>
                </div>
            </div>
        </Authenticated>
    );
}
