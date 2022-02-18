<template>
  <div v-if="!isMobile()">
      <login_page_d>
      </login_page_d>
  </div>
  <div v-else>
    <login_page_m>
    </login_page_m>
  </div>

</template>

<script>
  import login_page_m from "./login_page_m";
  import login_page_d from "./login_page_d";

  export default {
    components: {
      login_page_m,
      login_page_d
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