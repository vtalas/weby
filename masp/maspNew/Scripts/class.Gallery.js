var Gallery = (function () {
	/**
	 *
	 * @param {Array.<GalleryImage>} galleryImages
	 * @constructor
	 */
	function Gallery(galleryImages) {
		this.images = galleryImages || [];
		this.locales = null;
	}

	Gallery.prototype.galleryThumb = function (galleryId) {
		var image = this.images[0];
		image.setGalleryId(galleryId);
		return image;
	};

	return Gallery;
}());
