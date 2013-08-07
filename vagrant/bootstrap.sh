which wstest
if [[ $? == 0 ]]; then
    service haproxy start
    service nginx start
    service supervisor start
    exit 0
fi

apt-get update
apt-get -y upgrade

mkdir -p /usr/local/bin
chown -R vagrant /usr/local/bin

apt-get install -y libevent-dev libzmq-dev git pkg-config
apt-get install -y php5-cli php5-dev php-pear php5-sqlite php5-xdebug

/vagrant/bin/xdebug_disable
rm /etc/php5/mods-available/xdebug.ini
ln -s /vagrant/templates/xdebug.ini /etc/php5/mods-available/xdebug.ini

printf "\n" | sudo pecl install channel://pecl.php.net/libevent-0.0.5
echo "extension=libevent.so" >> /etc/php5/cli/php.ini

git clone https://github.com/mkoppanen/php-zmq.git
sh -c "cd php-zmq && phpize && ./configure && make --silent && make install"
echo "extension=zmq.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`
rm -rf php-zmq

wget http://getcomposer.org/installer
php installer
mv composer.phar /usr/local/bin/composer
chown vagrant /usr/local/bin/composer
rm installer

pear config-set auto_discover 1
pear install pear.phpunit.de/PHPUnit

apt-get install -y python-setuptools python-dev python-twisted supervisor
easy_install autobahntestsuite==0.5.2
service supervisor stop
ln -s /vagrant/templates/supervisor.conf /etc/supervisor/conf.d/socketome.conf
sudo update-rc.d supervisor disable
service supervisor start

apt-key add /vagrant/nginx_signing.key
echo "deb http://nginx.org/packages/ubuntu/ quantal nginx" >> /etc/apt/sources.list
echo "deb-src http://nginx.org/packages/ubuntu/ quantal nginx" >> /etc/apt/sources.list
apt-get update
apt-get install -y nginx php5-fpm
mv /etc/nginx/conf.d/default.conf /etc/nginx/conf.d/default
ln -s /vagrant/templates/nginx-localhost.conf /etc/nginx/conf.d/socketome-localhost.conf
sudo update-rc.d nginx disable
service nginx restart

apt-get install -y haproxy
service haproxy stop
wget http://haproxy.1wt.eu/download/1.5/src/devel/haproxy-1.5-dev18.tar.gz
tar -zxvf haproxy-1.5-dev18.tar.gz
cd haproxy-1.5-dev18 && make install
rm -f /etc/haproxy/haproxy.cfg
ln -s /vagrant/templates/haproxy-localhost.cfg /etc/haproxy/haproxy.cfg
mv /usr/sbin/haproxy /usr/sbin/haproxy-1.4
ln -s /usr/local/sbin/haproxy /usr/sbin/haproxy
cp /vagrant/templates/haproxy-init-default /etc/default/haproxy
sudo update-rc.d haproxy disable
service haproxy start

echo 'export PATH=$PATH:/vagrant/bin' >> ~vagrant/.bashrc
