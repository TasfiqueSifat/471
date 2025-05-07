<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Rate Widget</title>
    <style>
        .exchange-rate-container {
            background-color: #fff;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .exchange-rate-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .exchange-rate-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
            margin: 0;
        }
        
        .exchange-rate-updated {
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .exchange-rate-form {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .exchange-rate-input {
            flex: 1;
            min-width: 250px;
        }
        
        .exchange-rate-select {
            flex: 1;
            min-width: 150px;
        }
        
        .exchange-rate-input input,
        .exchange-rate-select select {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            font-size: 1rem;
        }
        
        .exchange-rate-result {
            background-color: #f9fafb;
            border-radius: 0.5rem;
            padding: 1.5rem;
            text-align: center;
        }
        
        .exchange-rate-amount {
            font-size: 2rem;
            font-weight: 700;
            color: #0369a1;
            margin-bottom: 0.5rem;
        }
        
        .exchange-rate-info {
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .exchange-rate-popular {
            margin-top: 2rem;
        }
        
        .exchange-rate-popular-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }
        
        .exchange-rate-popular-rates {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 1rem;
        }
        
        .exchange-rate-card {
            background-color: #f9fafb;
            border-radius: 0.5rem;
            padding: 1rem;
            text-align: center;
            transition: transform 0.2s;
        }
        
        .exchange-rate-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .exchange-rate-card-rate {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0369a1;
            margin-bottom: 0.25rem;
        }
        
        .exchange-rate-card-pair {
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .exchange-rate-popular-rates {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="exchange-rate-container">
        <div class="exchange-rate-header">
            <h3 class="exchange-rate-title">Currency Exchange Rates</h3>
            <span class="exchange-rate-updated" id="last-updated">Updating...</span>
        </div>
        
        <div class="exchange-rate-form">
            <div class="exchange-rate-input">
                <input type="number" id="amount-input" value="1" min="0" step="0.01">
            </div>
            <div class="exchange-rate-select">
                <select id="from-currency">
                    <option value="BDT">BDT - Bangladeshi Taka</option>
                    <option value="USD">USD - US Dollar</option>
                    <option value="EUR">EUR - Euro</option>
                    <option value="GBP">GBP - British Pound</option>
                    <option value="JPY">JPY - Japanese Yen</option>
                    <option value="CAD">CAD - Canadian Dollar</option>
                    <option value="AUD">AUD - Australian Dollar</option>
                    <option value="CHF">CHF - Swiss Franc</option>
                </select>
            </div>
            <div class="exchange-rate-select">
                <select id="to-currency">
                    <option value="BDT">BDT - Bangladeshi Taka</option>
                    <option value="EUR">EUR - Euro</option>
                    <option value="USD">USD - US Dollar</option>
                    <option value="GBP">GBP - British Pound</option>
                    <option value="JPY">JPY - Japanese Yen</option>
                    <option value="CAD">CAD - Canadian Dollar</option>
                    <option value="AUD">AUD - Australian Dollar</option>
                    <option value="CHF">CHF - Swiss Franc</option>
                </select>
            </div>
        </div>
        
        <div class="exchange-rate-result">
            <div class="exchange-rate-amount" id="converted-amount">--</div>
            <div class="exchange-rate-info" id="rate-info">1 USD ≈ -- EUR</div>
        </div>
        
        <div class="exchange-rate-popular">
            <h4 class="exchange-rate-popular-title">Popular Exchange Rates</h4>
            <div class="exchange-rate-popular-rates" id="popular-rates">
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const API_KEY = '5c5c1ac86be2001252660d34'; 
            
          
            const amountInput = document.getElementById('amount-input');
            const fromCurrency = document.getElementById('from-currency');
            const toCurrency = document.getElementById('to-currency');
            const convertedAmount = document.getElementById('converted-amount');
            const rateInfo = document.getElementById('rate-info');
            const lastUpdated = document.getElementById('last-updated');
            const popularRates = document.getElementById('popular-rates');
            
            const popularPairs = [
                { from: 'USD', to: 'EUR' },
                { from: 'USD', to: 'BDT' },
                { from: 'EUR', to: 'USD' },
                { from: 'GBP', to: 'USD' },
                { from: 'BDT', to: 'JPY' },
                { from: 'USD', to: 'CAD' }
            ];
            
            async function fetchExchangeRates() {
                try {
                    const response = await fetch(`https://open.er-api.com/v6/latest/${fromCurrency.value}`);
                    const data = await response.json();
                    
                    if (data.result === 'success') {
                        updateConversion(data.rates);
                        updatePopularRates(data.rates);
                        updateLastUpdated(data.time_last_update_utc);
                    } else {
                        throw new Error('Failed to fetch exchange rates');
                    }
                } catch (error) {
                    console.error('Error fetching exchange rates:', error);
                    convertedAmount.textContent = 'Error fetching rates';
                    rateInfo.textContent = 'Please try again later';
                }
            }
            
            function updateConversion(rates) {
                const amount = parseFloat(amountInput.value);
                const from = fromCurrency.value;
                const to = toCurrency.value;
                const rate = rates[to];
                
                if (rate) {
                    const converted = amount * rate;
                    convertedAmount.textContent = `${converted.toFixed(2)} ${to}`;
                    rateInfo.textContent = `1 ${from} ≈ ${rate.toFixed(4)} ${to}`;
                }
            }
            
            function updatePopularRates(rates) {
                popularRates.innerHTML = '';
                
                popularPairs.forEach(pair => {
                    if (pair.from === fromCurrency.value) {
                        const rate = rates[pair.to];
                        if (rate) {
                            const card = document.createElement('div');
                            card.className = 'exchange-rate-card';
                            card.innerHTML = `
                                <div class="exchange-rate-card-rate">${rate.toFixed(4)}</div>
                                <div class="exchange-rate-card-pair">${pair.from} / ${pair.to}</div>
                            `;
                            popularRates.appendChild(card);
                        }
                    }
                });
            }
            
            function updateLastUpdated(timestamp) {
                const date = new Date(timestamp);
                lastUpdated.textContent = `Last updated: ${date.toLocaleString()}`;
            }
            
            amountInput.addEventListener('input', () => fetchExchangeRates());
            fromCurrency.addEventListener('change', () => fetchExchangeRates());
            toCurrency.addEventListener('change', () => fetchExchangeRates());
            
            fetchExchangeRates();
        });
    </script>
</body>
</html>