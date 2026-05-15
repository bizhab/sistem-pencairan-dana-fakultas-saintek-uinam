<script setup>
</script>

<template>
  <div>

    <!-- Navbar -->
    <nav style="background: #333; color: white; padding: 15px;">
      <h2>My App </h2>
    </nav>

    <!-- Content -->
    <main style="padding: 20px;">
      <slot />
    </main>

    <!-- Footer -->
    <footer style="background: #eee; padding: 10px;">
      <p>Footer App</p>
    </footer>

  </div>
</template>