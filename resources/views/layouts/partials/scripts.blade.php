<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script de recherche d'élèves -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    let searchInput = document.getElementById("search-eleve");

    if (searchInput) {
        searchInput.addEventListener("keyup", function () {
            let query = this.value;

            fetch(`/eleves-recherche?q=${query}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("eleves-table").innerHTML = data;
                });
        });
    }
});
</script>

<!-- Scripts des pages -->
@yield('scripts')