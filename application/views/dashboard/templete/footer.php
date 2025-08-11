<script>
const sidebar = document.getElementById('sidebar');
const menuButton = document.getElementById('mobile-menu-button');
const backdrop = document.getElementById('backdrop');

menuButton.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
    backdrop.classList.toggle('hidden');
    backdrop.classList.toggle('opacity-0');
    backdrop.classList.toggle('opacity-50');
});

backdrop.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    backdrop.classList.add('hidden');
    backdrop.classList.add('opacity-0');
    backdrop.classList.remove('opacity-50');
});
</script>
</body>

</html>