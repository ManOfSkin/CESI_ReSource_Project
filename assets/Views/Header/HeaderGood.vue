<template>

  <div v-if="!isMobile()" id="HeaderDesktop">
    <HeaderDesktop>
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