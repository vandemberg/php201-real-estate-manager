require 'mechanize'
require 'byebug'
require 'nokogiri'

links = []
email = 'vandemberg.silva.lima@gmail.com'

agent = Mechanize.new
page = agent.get('http://161.35.6.160')
body = Nokogiri::HTML(page.body)
body.css('main a').each do |node|
    links << node['href'] if node.text.include?('Bedrooms: 5')
end

links.each do |link|
    page = agent.get(link)
    form = page.forms.first
    form.field_with(name: 'email').value = email
    form.submit
end

puts "END"
