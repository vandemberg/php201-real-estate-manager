require 'mechanize'
require 'byebug'
require 'nokogiri'

byebug

agent = Mechanize.new
page = agent.get('http://161.35.6.160')
body = Nokogiri::HTML(page.body)

byebug

puts "END"
