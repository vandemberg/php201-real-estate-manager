require 'mechanize'
require 'byebug'
require 'nokogiri'
require 'json'

links = []
email = 'vandemberg.silva.lima@gmail.com'

agent = Mechanize.new
page = agent.get('http://161.35.6.160/login')
body = Nokogiri::HTML(page.body)

byebug

puts "END"
