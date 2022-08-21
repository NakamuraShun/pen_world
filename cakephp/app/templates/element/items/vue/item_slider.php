<script type="text/x-template" id="temp-item-slider">
	<figure class="ratio_equal bg_mono_sub-content frame_mono_sub-border">
		<img :src='"/img/" + selectThumbSrc' class="object_contain">
	</figure>
	<div class="flex justify_center margin_t_small" ref="thumbWrap">
		<img v-for="(thumbSrc,index) in thumbsrcarr" :src='"/img/" + thumbSrc' @click="selectImageFun(thumbSrc,index)" class="thumb_angle_medium object_cover pointer margin_h_xsmall">
	</div>
</script>

<script>
	const data = {
			data(){
				return {
				}
			}
		}
	VueAppItemSlider = Vue.createApp(data)
	
	VueAppItemSlider.component('vue-item-slider', {
		template: '#temp-item-slider',
		inheritAttrs: false,
		props: ['thumbsrcarr'],
		data(){
			return {
				selectThumbSrc: '', // メイン画像URL
			}
		},

		methods:{
			selectImageFun(thumbSrc,index){
				this.selectThumbSrc = thumbSrc
				// サムネイルフレーム調整
				thumbWrap = this.$refs.thumbWrap
				for(let i = 0; i < this.thumbsrcarr.length; i++){
					thumbWrap.children[i].classList.remove("frame_main-base")
				}
				thumbWrap.children[index].classList.add("frame_main-base")
			},
		},

		mounted(){
			this.selectThumbSrc = this.thumbsrcarr[0]
			// サムネイルフレーム調整
			thumbWrap = this.$refs.thumbWrap
			thumbWrap.firstElementChild.classList.add("frame_main-base")
		}
	})

	VueAppItemSlider.mount('#VueAppItemSlider')
</script>
