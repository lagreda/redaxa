<script>
    import { Bar } from 'vue-chartjs'

    export default {
        extends: Bar,
        //name: 'chart-example',
        props: [ 'data', 'options' ],
        mounted() {
            console.log('Chart Example Component mounted.')
            // Overwriting base render method with actual data.
            this.renderChart(this.data, this.options)
        }
    }
</script>
