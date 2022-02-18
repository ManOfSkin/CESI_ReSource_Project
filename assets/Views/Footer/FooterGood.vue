<template>
  <div v-if="!isMobile()">
    <FooterDesktop>
    </FooterDesktop>
  </div>
  <div v-else>
    <FooterMobile>
    </FooterMobile>
  </div>

</template>

<script>
import FooterDesktop from "./FooterDesktop";
import FooterMobile from "./FooterMobile";
export default {
  components: {
    FooterMobile,
    FooterDesktop
  },
  name: "FooterGood",
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

<style scoped>

</style>