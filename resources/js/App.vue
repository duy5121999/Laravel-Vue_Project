<template>
  <div>
    <Header></Header>
       <Loader :start="spin.val"/>
    <transition name="fade">
      <router-view></router-view>
    </transition>
    <CheckOnl> </CheckOnl>
    <Footer></Footer>
  </div>
</template>
<script>
    import Header from './components/Header';
    import Footer from './components/Footer';
    import CheckOnl from './components/CheckOnl';
    import Loader from './components/Loader.vue';
    export default{
        components: {
          Header,
          Footer,
          CheckOnl,
          Loader
        },
        data() {
          return {
             spin:{
               val : false
             }
          }
        },
        provide(){
          return {
            myLoader : this.spin
          }
        }
                
    }
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700&display=swap');
        html{
            scroll-behavior: smooth;
            overflow-x: hidden;
        }
        html, body {
            font-family: 'Montserrat', sans-serif;
        }
        #app {
            font-family: 'Montserrat', sans-serif;
        }

</style>