# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|

  config.vm.provider "virtualbox" do |v|
  v.memory = 4096
  v.cpus = 2
end
  
  
  config.vm.box = "ubuntu/trusty64"
  config.vm.box_check_update = false
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.hostname = "localhost"
  
  
  
  config.vm.synced_folder "mediawiki/", "/mediawiki",
    owner: "www-data", group: "www-data"

  

  # Error correction
  # config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'"  
  
  
  #  fix-no-tty 
  config.vm.provision "fix-no-tty", type: "shell" do |s|
    s.privileged = false
    s.inline = "sudo sed -i '/tty/!s/mesg n/tty -s \\&\\& mesg n/' /root/.profile"
end
  
  
  # Shell Provision
   config.vm.provision :shell, path: "bootstrap.sh"
end