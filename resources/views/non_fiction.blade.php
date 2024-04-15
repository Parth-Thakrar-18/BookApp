@include('partials.catBookDashLayout')
    <script>
        $(document).ready(function() {
            $('#filterSelect').change(function() {
                var selectedOption = $(this).val();
                var option= selectedOption; 
                if (selectedOption === 'highest') {
                    window.location.href = '{{ route('non_fiction', ['filter' => 'highest']) }}';
                } else if (selectedOption === 'famous') {
                    window.location.href = '{{ route('non_fiction', ['filter' => 'famous']) }}';
                  }
                 else if(selectedOption === 'lowest') {
                    window.location.href = '{{ route('non_fiction', ['filter' => 'lowest']) }}';
                }
            });
        });
    </script>
</body>

</html>
