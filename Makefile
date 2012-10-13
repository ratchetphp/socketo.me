build:
	rm -rf web/vendor
	mkdir -p web/vendor
	cp -r vendor/cujojs/when web/vendor/when
	cp -r vendor/gimite/web-socket-js web/vendor/web-socket-js
	cp -r vendor/tavendo/autobahnjs web/vendor/autobahnjs

	rm -rf web/api web/reports
	cp -r api reports web

.PHONY: build

