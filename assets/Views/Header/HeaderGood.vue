<template>

  <div v-if="!isMobile()" id="HeaderDesktop">
    {{$attrs['data-isauthenticated']}}
    <HeaderDesktop :data-isAuthenticated="$attrs['data-isauthenticated']">
    </HeaderDesktop>
  </div>
  <div v-else>
    <HeaderMobile>
    </HeaderMobile>
  </div>

</template>

<script>
  import HeaderDesktop from './HeaderDesktop.vue'
  import HeaderMobile from './HeaderMobile.vue'

  export default {
    components: {
      HeaderDesktop,
      HeaderMobile
    },
    prop: {
      'isAuthenticated': {
        type: Boolean,
        default: false
      }
    },
    data() {
      return {
        isAuthenticated: this.isAuthenticated
      }
    },
    mounted: function() {
      this.isAuthenticated = this.$attrs['data-isauthenticated'];
      console.log(this.$attrs);
      console.log(this.isAuthenticated);
    },
    methods: {
      isMobile() {
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          return true
        } else {
          return false
        }
      }
    }
  }

</script>